# symfony-template
This is a template for a docker based development of a symfony based application with nginx.

___Uses:___ 
* php 8.0
* nginx 1.9.15

```shell
docker build -f devops/images/stfc_prod_php.Dockerfile -t stfc_prod:latest .
```

## Templates
There are two issue templates for GitHub included in the repo.  These can prompt the reporters to generate good issues.
In addition, there is a Pull Request Template to help keep the communication focus on the PR to help create quality pull
requests.  These templates should be updated and expanded upon to meet your project's needs.

### Bug Report
Bug reports that stress reproduction steps, expected behavior and screenshots

### Feature Request
Feature requests that keep the focus on the problem that needs to be resolved over how the reported feels it should be
solved with prompts for additional information

## Setup docker environment
Assuming that you have already installed docker on your local machine.  You will need the full path to the solution
folder.  Once the solution is cloned you will need to copy the `devops/dev/docker-compose.override.yml.example` to
`devops/dev/docker-compose.override.yml`.  Every place that that has `<path to solution>` will need to be replaced with
the fully qualified path to the base folder of the solution, should be a folder path ending in the name of your repository unless you cloned
the repo to a custom folder name.  The project `.gitignore` will not allow this file to be committed to the repo as it is
dependent on the local environment

From the project root
```shell
cp devops/dev/docker-compose.override.yml.example devops/dev/docker-compose.override.yml
```

### Run the docker solution
The first time that this solution is run it will need to build the project containers and download the base containers
used in the project.  This initial build can take some time, grab a coffee after executing the up command for the first
time.

From the project root directory
```shell
cd devops/dev
docker-compose up -d
```

### command line access to php container
From the `devops/dev` directory
```shell
docker-compose exec php bash
```

## Installing Symfony
The symfony directory is empty.  The included `php.Dockerfile` is build off the official php8.0:fpm-buster image.  The
resulting image contains both composer and the symfony cli installer already installed in the image.

Access the running php container's command line as described in the previous section to perform the installation of 
symfony. This will ensure that symfony is installed in the container's php version.  Once the installation is complete 
you can also install any other packages your project will require using `composer`.

You can follow the official Symfony [Documentation](https://symfony.com/doc/current/index.html) to install the symfony
base solution that suits your needs.

__Warning:__ the symfony installer will create a new git environment inside the `symfony` directory.  Be sure to remove
the `.git` directory from inside the `symfony` directory.

## Accessing the solution via http
The included `nginx.Dockerfile` will make the symfony solution available from your local environment on port 8081.
Navigate you web browser to http://localhost:8081 to view the solution.

If you are creating a cli application that does not utilize a web interface you can remove the `images/nginx` directory, 
`nginx.Dockerfile` and `/logs` directory from the solution along with the accompanying settings in the 
`docker-compose.yml`, `docker-compose.override.yml.example` and your `docker-compose.override.yml` files.

## logs
The nginx server will log to the solutions `/logs/nginx` directory

## Template Usage
Please update this README file to suit the needs of your project, I only ask that you please reference the template
project if you base a solution off it.  If possible please keep below this line when you use this template for your project

---
<dl>
    <dt>
        <em>Based of the <a href="https://github.com/ryanwhowe/symfony-template">symfony-template</a> GitHub Template project</em>
    </dt>
    <dd>
        <strong>by <a href="https://github.com/ryanwhowe" target="_blank">Ryan Howe</a></strong>
    </dd>
</dl>