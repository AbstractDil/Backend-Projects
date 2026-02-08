#include <stdio.h>

// create a program that counts to 100 by tens
int main() {
    for (int i = 0; i <= 100; i += 10) {
        printf("%d\n", i);
    }
    return 0;
}

/*
* output example:
* 0
* 10
* 20
* 30
* 40
* 50
* 60
* 70
* 80
* 90
* 100
*/