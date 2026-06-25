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
echo Waiting for the web server to come up...
REM Give nginx/php-fpm a few seconds to be ready before opening the browser
timeout /t 5 /nobreak >nul

start "" http://localhost:8000
echo.
echo Berlussimo is running at http://localhost:8000
echo (Use stop.bat to shut it down.)
echo.
pause
