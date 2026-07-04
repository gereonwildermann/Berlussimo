# ============================================================================
#  Berlussimo - stop (native). Stops the web server and the database.
#  Your data is kept (it lives in %LOCALAPPDATA%\Berlussimo\mariadb-data).
# ============================================================================
$ErrorActionPreference = 'SilentlyContinue'

# Stop the Laravel web server (whatever listens on 8000)
Get-NetTCPConnection -LocalPort 8000 -State Listen |
    ForEach-Object { Stop-Process -Id $_.OwningProcess -Force }

# Stop MariaDB (whatever listens on 3306)
Get-NetTCPConnection -LocalPort 3306 -State Listen |
    ForEach-Object { Stop-Process -Id $_.OwningProcess -Force }
