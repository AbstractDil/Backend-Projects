#include <stdio.h>
// create a program that only print even numbers between 0 and 10 (inclusive)
int main() {
    /*
    for (int i = 0; i <= 10; i++) {
        if (i % 2 == 0) {
            printf("%d\n", i);
        }
    }
    */

    int i;
    for (i = 0; i <= 10; i = i + 2) {
     printf("%d\n", i);
    }

    return 0;
}

/*
* output example:
* 0
* 2
* 4
* 6
* 8
* 10
*/