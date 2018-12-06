# Backing up entities in  Google Cloud Datastore


### Setting up the project


###### Authenticate with the GCloud command line tool

`gcloud auth login`


###### Configure the correct G Cloud project ID to use later

This is set as a variable as it will be used multiple times, and helps avoid accidentally exporting a certain projects datastore into a different projects bucket as that could cause a mess if that data was later imported)

`PROJECT_ID="YOUR_PROJECT_ID"`


###### Set the G Cloud Project to the above ID

`gcloud config set project ${PROJECT_ID}`


##### Set the destination bucket name for use later.

Be sure to create this bucket first if it doesn't already exist

`BUCKET="YOUR_BUCKET_NAME[/NAMESPACE_PATH]"`

(Namespace path is essentially the (optional) folder within that bucket)


### Exporting / Backing up the datastore

##### Export

Export the entities into the specified bucket.

`gcloud datastore export --namespaces="(default)" gs://${BUCKET}`

##### Import

Import the entitites from the specified bucket into the currently set projects datastore.

`gcloud datastore import gs://${BUCKET}/[PATH]/[FILENAME].overall_export_metadata`
