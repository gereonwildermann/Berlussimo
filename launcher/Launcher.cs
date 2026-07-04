// Tiny native launcher: runs a PowerShell script (same base name is passed in
// at compile time via /define) hidden, with no console window. Compiled to
// Start-Berlussimo.exe / Stop-Berlussimo.exe by launcher/build.sh.
using System;
using System.Diagnostics;
using System.IO;

class Launcher
{
    static void Main()
    {
        string dir = AppDomain.CurrentDomain.BaseDirectory;
#if STOP
        string script = "berlussimo-stop.ps1";
#else
        string script = "berlussimo-start.ps1";
#endif
        string ps1 = Path.Combine(dir, script);
        var psi = new ProcessStartInfo("powershell.exe",
            "-NoProfile -ExecutionPolicy Bypass -WindowStyle Hidden -File \"" + ps1 + "\"")
        {
            UseShellExecute = false,
            CreateNoWindow = true,
            WorkingDirectory = dir
        };
        Process.Start(psi);
    }
}
