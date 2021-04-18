FROM wordpress

# `less` is used by WP-CLI, `emacs` is used to configure things
RUN apt-get update && apt-get install less emacs-nox;

# Install and configure WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar; \
	chmod +x wp-cli.phar; \
	mv wp-cli.phar /usr/local/bin/; \
	# Workaround for root usage scolding.
	echo "#!/bin/bash\n\n/usr/local/bin/wp-cli.phar \"\$@\" --allow-root\n" > /usr/local/bin/wp; \
	chmod +x /usr/local/bin/wp;
