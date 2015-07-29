if [ -f "pr.txt" ]; then
  # IF the pr file exists then call the deployment script
  ./deploy_pr.sh $(cat pr.txt)
  rm pr.txt # Remove the file to indicate that the deploy has been triggered
fi
