#!/bin/bash

# Прерывать скрипт при ошибках
set -ex

docker run --rm -v "$(pwd)":/app -u "$(id -u)":"$(id -g)" composer:2 sh -c "composer install --ignore-platform-reqs && chown -R $(id -u):$(id -g) /app"

echo "✅ Установка завершена!"