# ============================================================================
#  Berlussimo - one-click start (native: MariaDB + PHP, no Docker)
#  Started by Start-Berlussimo.exe. Starts the database and the web server,
#  waits until the app answers, then opens it in your browser.
# ============================================================================
$ErrorActionPreference = 'SilentlyContinue'
$root = $PSScriptRoot

$mariadbd = 'C:\Program Files\MariaDB 12.3\bin\mariadbd.exe'
$dataDir  = Join-Path $env:LOCALAPPDATA 'Berlussimo\mariadb-data'

function Test-Port($p) {
    $c = New-Object System.Net.Sockets.TcpClient
    try { $c.Connect('127.0.0.1', $p); return $c.Connected }
    catch { return $false }
    finally { $c.Close() }
}

# 1) Database - start MariaDB if it isn't already listening on 3306
if (-not (Test-Port 3306)) {
    Start-Process -FilePath $mariadbd `
        -ArgumentList "--datadir=`"$dataDir`"", '--port=3306', '--console' `
        -WindowStyle Hidden
    for ($i = 0; $i -lt 40 -and -not (Test-Port 3306); $i++) { Start-Sleep -Milliseconds 500 }
}

# 2) Web server - start Laravel (php artisan serve) if 8000 is free
if (-not (Test-Port 8000)) {
    Start-Process -FilePath 'php' `
        -ArgumentList 'artisan', 'serve', '--host=127.0.0.1', '--port=8000' `
        -WorkingDirectory $root -WindowStyle Hidden
}

# 3) Wait until the app actually answers, then open the browser
for ($i = 0; $i -lt 60; $i++) {
    try {
        if ((Invoke-WebRequest 'http://127.0.0.1:8000/login' -UseBasicParsing -TimeoutSec 3).StatusCode -eq 200) { break }
    } catch {}
    Start-Sleep -Milliseconds 500
}
Start-Process 'http://localhost:8000'
