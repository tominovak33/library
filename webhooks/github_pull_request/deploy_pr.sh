#!/usr/bin/env bash

# $1 is the PR number
# $2 is the branch name

# Move this file onto the server (it is only here for source control reasons)
# If the web root is /home/lapis/www place this file in /home/lapis
# This file will delete your www folder so be sure to back it up beforehand
echo 'PR Deployment Started'
current_dir="$PWD" # Save the starting directory for use later

#DEPLOY_PATH=$(date +%Y%m%d-%H-%M) # Current timestamp used for creating timestamped deployment folders

# Check to see if the releases folder already exists or not
if [ ! -d $1 ]; then
  mkdir $1 # Make pr directory if it doesn't exist yet
fi

cd $1

git clone -b $2 git@github.com:tominovak33/lapis.git #Git clone the specified branch of the repo. (specify as the first command line argument eg: "sh deployment_sctipt.sh master"

cd "$current_dir" # Change back to starting directory

# The config file is server specific and not in the repo so
# This should be set up before the first deploy. Use the example file in the repo to get started)
ln -s $current_dir/../includes/config.php $current_dir/$1/lapis/includes/config.php #symlink the config file in the new folder back to the servers config file.

touch $1/lapis/logs/query_log.txt

echo 'Dev Deployment Complete'
