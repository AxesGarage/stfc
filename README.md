# stfc
This is a template for a docker based development of a symfony based application with nginx.

## Setup docker environment
Assuming that you have already installed docker on your local machine.  You will need the full path to the solution
folder.  Once the solution is cloned you will need to copy the `devops/stfc_dev/docker-compose.override.yml.example` to
`devops/stfc_dev/docker-compose.override.yml`.  Every place that that has `<path to solution>` will need to be replaced with
the fully qualified path to the base folder of the solution, should be a folder path ending in the name of your repository unless you cloned
the repo to a custom folder name.  The project `.gitignore` will not allow this file to be committed to the repo as it is
dependent on the local environment

From the project root
```shell
cp devops/stfc_dev/docker-compose.override.yml.example devops/stfc_dev/docker-compose.override.yml
```

### Run the development docker solution
The first time that this solution is run it will need to build the project containers and download the base containers
used in the project.  This initial build can take some time, grab a coffee after executing the up command for the first
time.

From the project root directory
```shell
make docker-dev-up
make docker-dev-install
```

### command line access to php developemnt container
From the `devops/dev` directory
```shell
make docker-dev-bash
```

## Accessing the solution via http
The included `nginx.Dockerfile` will make the symfony solution available from your local environment on port 8081.
Navigate you web browser to http://localhost:8081 to view the solution.

If you are creating a cli application that does not utilize a web interface you can remove the `images/nginx` directory, 
`nginx.Dockerfile` and `/logs` directory from the solution along with the accompanying settings in the 
`docker-compose.yml`, `docker-compose.override.yml.example` and your `docker-compose.override.yml` files.

## logs
The nginx server will log to the solutions `/logs/nginx` directory

---
<dl>
    <dt>
        <em>Based of the <a href="https://github.com/ryanwhowe/symfony-template">symfony-template</a> GitHub Template project</em>
    </dt>
    <dd>
        <strong>by <a href="https://github.com/ryanwhowe" target="_blank">Ryan Howe</a></strong>
    </dd>
</dl>