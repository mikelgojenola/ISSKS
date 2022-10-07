#!/bin/bash
for f in *.jpg;do
	sudo md5sum "$f"
done

