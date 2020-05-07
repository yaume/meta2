#!/bin/bash
here="`dirname \"$0\"`"
cd "$here"
imagemin *.jpg --out-dir=optimized --plugin=mozjpeg
imagemin *.jpg --out-dir=optimized --plugin=webp
