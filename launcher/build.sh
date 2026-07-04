#!/bin/sh
# Compiles the one-click launcher executables from Launcher.cs using the
# .NET Framework compiler that ships with Windows. Run from the repo root:
#   sh launcher/build.sh
CSC="/c/Windows/Microsoft.NET/Framework64/v4.0.30319/csc.exe"

"$CSC" -nologo -target:winexe -out:Start-Berlussimo.exe launcher/Launcher.cs
"$CSC" -nologo -target:winexe -define:STOP -out:Stop-Berlussimo.exe launcher/Launcher.cs

echo "Built Start-Berlussimo.exe and Stop-Berlussimo.exe"
