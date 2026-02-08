#include <stdio.h>

int main(void) {
    int x = 5;

    // Increment
    printf("Initial x = %d\n", x);   // prints 5
    x++;                             // x becomes 6
    printf("After x++ : x = %d\n", x); // prints 6

    ++x;                             // x becomes 7
    printf("After ++x : x = %d\n", x); // prints 7

    // Decrement
    x--;                             // x becomes 6
    printf("After x-- : x = %d\n", x); // prints 6

    --x;                             // x becomes 5
    printf("After --x : x = %d\n", x); // prints 5

    return 0;
}

/****************************
* Output:
Initial x = 5
After x++ : x = 6
After ++x : x = 7
After x-- : x = 6
After --x : x = 5
*****************************/