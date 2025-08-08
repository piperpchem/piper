#!/bin/bash

# If a command fails then the deploy stops
#set -eE
#trap 'echo "Error on line $(caller | awk "{print \$1}")"' ERR

SITE_DIR=/home/ssinglet/work/piper
pushd $SITE_DIR

# stage all changes
git add .

## excerpt from https://lukmayer.github.io/blog/posts/fast_quarto.html
# Get list of changed .qmd or .md files in git working tree
CHANGED_FILES=$(git status --porcelain --untracked-files=no | awk '{print $2}' | grep -E '\.qmd$|\.md$')

if [ -z "$CHANGED_FILES" ]; then
    echo "No changed Quarto files to render"
    exit 0
fi

if [ "$1" = "full" ]; then
    # Render entire site
    quarto render
else
    echo "Rendering changed files:"
    echo "$CHANGED_FILES"
    quarto render $CHANGED_FILES
    # Commit changes to git.
    echo "Enter a commit message:"
    read commit_message
    git commit -m "$commit_message"
fi

# Commit changes.
# msg="rebuilding site $(date)"
# if [ -n "$*" ]; then
#     msg="$*"
# fi
# git commit -m "$msg"

# upload site files to chemistry.coe.edu
printf "Uploading to chemistry.coe.edu..."
# --omit-dir-times avoids error about setting time for directory "."
rsync -avz --omit-dir-times --delete docs/* chemistry.coe.edu:/var/www/html/piper
echo "Done with sync"

# Push source and build repos to github pages site
git push origin main

popd
