@echo off
REM ===========================================================================
REM  Berlussimo - stop
REM  Stops all containers. Your database data is kept (named volume).
REM ===========================================================================
cd /d "%~dp0"

echo Stopping Berlussimo (Docker)...
docker compose down

echo.
echo Stopped. Data is preserved. Run start.bat to bring it back up.
echo.
pause
