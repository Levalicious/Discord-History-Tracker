#!/bin/bash
set -e

if [ ! -f "./app/DiscordHistoryTracker.sln" ]; then
	echo "Missing DiscordHistoryTracker.sln in working directory!"
	exit 1
fi

makezip() {
	pushd "./bin/$1"
	zip -9 -r "../$1.zip" .
	popd
}

rm -rf "./bin"

configurations=(linux-x64 osx-x64)

for cfg in ${configurations[@]}; do
  cd app
	dotnet publish Desktop -c Release -r "$cfg" -o "../bin/$cfg" -p:PublishSingleFile=true -p:IncludeNativeLibrariesForSelfExtract=true -p:PublishReadyToRun=false -p:PublishTrimmed=true --self-contained true
	cd ..
	makezip "$cfg"
done
