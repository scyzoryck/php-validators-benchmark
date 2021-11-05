CODEDIR = .

init: $(CODEDIR)/benchmarks/*/composer.json $(CODEDIR)/composer.json
	for file in $^ ; do \
		docker run --rm --tty \
			--volume $$PWD:/app \
			--workdir /app/`dirname $${file}` \
			--volume ${COMPOSER_CACHE_DIR:-$$HOME/.cache/composer}:$$COMPOSER_CACHE_DIR \
			--user $$(id -u):$$(id -g) \
	  		composer:2.1.5 install; \
	done

composer-optimise: $(CODEDIR)/benchmarks/*/composer.json $(CODEDIR)/composer.json
	for file in $^ ; do \
		docker run --rm --tty \
			--volume $$PWD:/app \
			--workdir /app/`dirname $${file}` \
			--volume ${COMPOSER_CACHE_DIR:-$$HOME/.cache/composer}:$$COMPOSER_CACHE_DIR \
			--user $$(id -u):$$(id -g) \
	  		composer:2.1.5 install --optimize-autoloader --classmap-authoritative; \
	done

test:
	docker run --rm \
		--volume $$PWD:/app \
		--workdir /app \
		--user $$(id -u):$$(id -g) \
		php:8.0.12-cli php ./vendor/bin/phpbench run --report=bench

bash-php:
	docker run --rm -it \
		--volume $$PWD:/app \
		--workdir /app \
		--user $$(id -u):$$(id -g) \
		php:8.0-cli bash

bash-composer:
	docker run --rm -it \
		--volume $$PWD:/app \
		--workdir /app \
		--user $$(id -u):$$(id -g) \
		composer:2.1.5 bash
