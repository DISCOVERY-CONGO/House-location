.PHONY: help
help: ## Affiche cette aide
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: install
install: vendor/autoload.php ## Installe les différentes dépendances
	composer install

.PHONY: migrate
migrate: vendor/autoload.php ## Migre la base de donnée
	php artisan migrate

.PHONY: fresh
fresh: vendor/autoload.php
	php artisan migrate:fresh

.PHONY: seed
seed: vendor/autoload.php ## Remplie la base de données
	php artisan db:seed

.PHONY: analyze
analyse: vendor/autoload.php
	vendor/bin/phpstan analyse -c phpstan.neon

.PHONY: clear
clear: vendor/autoload.php ## vide le cache de l'application
	php artisan cache:clear && php artisan view:clear

.PHONY: serve
serve: vendor/autoload.php ## lance, le serve de development
	php -S localhost:8000 -t public server.php

.PHONE: create
create: vendor/autoload.php # creer un administrateur
	php artisan karibu:add-user

.PHONE: generate
generate: vendor/autoload.php ## Generate Ide models
	php artisan ide:models

.PHONY: watch
watch: vendor/autoload.php ## lance, le serve de development
	npm run watch

vendor/autoload.php: composer.lock
	composer install
	touch vendor/autoload.php
