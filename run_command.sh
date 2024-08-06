#!/bin/bash

# Set the interval (30 seconds)
INTERVAL=61

# Set the duration (1 hour)
DURATION=3600

# Calculate the number of iterations
ITERATIONS=$((DURATION / INTERVAL))

# Run the command in a loop
for i in $(seq 1 $ITERATIONS); do
  php artisan generate:english-file
  sleep $INTERVAL
done
