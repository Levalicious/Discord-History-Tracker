@echo off
set list=win-x64

rmdir /S /Q bin

(for %%a in (%list%) do (
  cd app
  dotnet publish Desktop -c Release -r %%a -o ../bin/%%a -p:PublishSingleFile=true -p:IncludeNativeLibrariesForSelfExtract=true -p:PublishReadyToRun=false -p:PublishTrimmed=true --self-contained true
  cd ..
  powershell "Compress-Archive -Path ./bin/%%a/* -DestinationPath ./bin/%%a.zip -CompressionLevel Optimal"
))

echo Done
pause
