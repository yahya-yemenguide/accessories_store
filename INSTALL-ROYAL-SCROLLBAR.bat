@echo off
chcp 65001 >nul
cd /d "%~dp0"
set "PHP_EXE=C:\xampp\php\php.exe"
if not exist "%PHP_EXE%" set "PHP_EXE=php"
"%PHP_EXE%" "install-royal-scrollbar.php"
if errorlevel 1 (
  echo.
  echo INSTALL FAILED. Read the error above. No other site files were intentionally modified.
  pause
  exit /b 1
)
"%PHP_EXE%" artisan optimize:clear
if errorlevel 1 echo NOTICE: Cache clear failed; scrollbar installation may still have succeeded.
echo.
echo Open your site and press CTRL+F5 to refresh.
pause
