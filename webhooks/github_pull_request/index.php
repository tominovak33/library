<?php

$hook_payload = $_POST['payload'];
$payload_object = json_decode($_POST['payload']);
$hook_file = fopen("payload.txt", "w");
fwrite($hook_file, $hook_payload);
fclose($hook_file);

if ($payload_object->action == 'opened') {
  $pull_request = [];
  $pull_request['number'] = $payload_object->number;
  $pull_request['branch'] = $payload_object->pull_request->head->ref;

  $pr_text = serialize($pull_request);

  $pr_file = fopen("pr.txt", "w");
  fwrite($pr_file, $pr_text);
  fclose($pr_file);
}

echo "Webhook recieved"
