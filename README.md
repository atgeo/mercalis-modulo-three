# ModThree Finite State Machine

This project implements a Finite State Machine (FSM) in PHP that computes the modulo 3 of a binary string.

## Requirements

- Docker
- Make

## Getting Started

### 1. Build the Docker image

Run the following command to build the containerized environment:

```bash
  make build
```

### 2. Run the FSM

To compute the modulo 3 of a binary string:

```bash
  make exec ARGS=1101
```
This will output 0, 1, or 2 depending on the modulo 3 of the binary input.

### 3. Run Unit Tests

To run PHPUnit tests inside the Docker container:

```bash
  make test
```

## File Structure

src/: Contains the FSM logic.

tests/: PHPUnit test cases.

Makefile: Build and execution automation.

Dockerfile: PHP environment with Composer and PHPUnit.
