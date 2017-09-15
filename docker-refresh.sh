echo "Copying repo"
docker run --rm --volumes-from=logo-me-data -v $(pwd):/source debian:jessie cp -r /source/. /web/

echo "Setting permissions"
docker run --rm --volumes-from=logo-me-data -w /web debian:jessie chmod -R 755 .

echo "Refreshed!"
