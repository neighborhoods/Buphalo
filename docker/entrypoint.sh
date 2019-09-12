#! /bin/bash
set -eo pipefail

# Shell out to the existing entrypoint script for New Relic setup
if [ -f /usr/local/bin/entrypoint.sh ]; then
	echo "Found entrypoint script from base image, executing: /usr/local/bin/entrypoint.sh $@"
	exec /usr/local/bin/entrypoint.sh "$@"
else
	echo "No other entrypoint scripts, executing: $@"
	exec "$@"
fi
