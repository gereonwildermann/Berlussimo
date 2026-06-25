@echo off
REM ===========================================================================
REM  Berlussimo - one-click start
REM  Builds (first run only) and starts the whole stack in Docker, then opens
REM  the app in your browser. Just double-click this file.
REM ===========================================================================
cd /d "%~dp0"

echo Starting Berlussimo (Docker)...
docker compose up -d --build
if errorlevel 1 (
    echo.
    echo Failed to start. Is Docker Desktop running?
    pause
    exit /b 1
)

echo.
echo Waiting for the web server to become ready...
REM Poll the login page until php-fpm has finished booting (avoids opening the
REM browser into a transient 502 right after startup). Up to ~60 seconds.
set /a tries=0
:waitloop
set /a tries+=1
curl -s -o nul -w "%%{http_code}" http://localhost:8000/login > "%TEMP%\berlussimo_http.txt" 2>nul
set /p CODE=<"%TEMP%\berlussimo_http.txt"
if "%CODE%"=="200" goto ready
if %tries% geq 30 goto ready
timeout /t 2 /nobreak >nul
goto waitloop

:ready
del "%TEMP%\berlussimo_http.txt" >nul 2>nul
start "" http://localhost:8000
echo.
echo Berlussimo is running at http://localhost:8000
echo (Use stop.bat to shut it down.)
echo.
pause
