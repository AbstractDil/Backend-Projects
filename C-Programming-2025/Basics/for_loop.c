#include <stdio.h>

// print_numbers function prints numbers from 1 to n using a for loop

int main() {
    int n;
    // Prompt user for input
    printf("Enter a positive integer: ");
    scanf("%d", &n);
    // Print numbers from 1 to n
    for (int i = 1; i <= n; i++) {
        printf("%d\n", i);
    }

    return 0;
}

/*
* output example:
* Enter a positive integer: 5
* 1
* 2
* 3
* 4
* 5
*/