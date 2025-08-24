#!/bin/bash

# If a command fails then the deploy stops
set -e

SITE_DIR=/home/ssinglet/work/piper

pushd $SITE_DIR

# Build the project.
quarto render

# Add changes to git.
#git add posts/*

# Commit changes.
# msg="rebuilding site $(date)"
# if [ -n "$*" ]; then
#     msg="$*"
# fi
# git commit -m "$msg"

# Push source and build repos to github pages site
#git push origin master

# copy to chemistry.coe.edu
printf "Uploading to chemistry.coe.edu..."
# --omit-dir-times avoids error about setting time for directory "."
rsync -avz --omit-dir-times --delete _site/* chemistry.coe.edu:/var/www/html/piper

echo "Done with sync"
popd
