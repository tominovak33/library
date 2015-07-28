IFS=$'\n'; # Lets the for loop split the input on newline char
counter=0;

for line in $(cat pr_test.txt);
  do
  if [ $counter -eq 0 ];
    then
     pr_number="$line"
  elif [ $counter -eq 1];
    then
    branch_name="$line"
  fi
  counter=$(expr $counter + 1)
done

./deploy_pr.sh "$pr_number" "$branch_name"
