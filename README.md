# mediasanctuary.org

Website for `lawnlab.org` aka Lawn (Re)Disturbance Laboratory.

## Basics

This is a WordPress site, the theme `lawnlab` and the plugins it depends on are managed here.

## Developer dependencies

* [node.js](https://nodejs.org/) v14
* [Docker Desktop](https://www.docker.com/products/docker-desktop)

## How to run locally

Start the Docker containers and the asset watcher:

```
./bin/start
```

Once it's running, load the website at [localhost:8080](http://localhost:8080/).

Exiting the `start` script (ctrl-C) stops the containers.

## Care and maintenance

Rebuild the container if necessary:

```
cd wp
docker compose build
```

Tail the logs:

```
cd wp
docker compose logs -f web
```

Login to a shell on the web server container:

```
cd wp
docker compose exec web bash
```

## About the image

The `Dockerfile` uses the official `wordpress` image, which in turn is built off of `php`. The `web` container uses Debian-style package management. We don't modify it very much, just installing some tools like [WP-CLI](https://wp-cli.org/).

There won't be any database tables setup first time you run the container, but you can install the site by visiting [localhost:8080](http://localhost:8080/).

You can connect to the MySQL database on port 3307.

## Updating plugins

We use WP-CLI to keep the plugin files up-to-date, and commit the changes to source control. Note that updates to the [Advanced Custom Fields](https://www.advancedcustomfields.com/) plugin require that you [configure it](http://localhost:8080/wp-admin/edit.php?post_type=acf-field-group&page=acf-settings-updates) with a license key.

How to upgrade the plugins:

```
cd wp
docker compose exec web wp plugin upgrade --all
```

## Updating WordPress core

To update your local WordPress dev instance:

```
cd wp
docker compose exec web wp core upgrade
```

Updating WordPress on the dev or prod servers requires that you SSH in and run `wp core upgrade` on the server.
