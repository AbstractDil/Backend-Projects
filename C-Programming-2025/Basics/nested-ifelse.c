#include <stdio.h>

// example of nested if-else statement in C

int main() {
    
   int number;
    printf("Enter a number: ");
    scanf("%d", &number);

    if (number > 0) {  // Outer condition
        printf("The number is positive.\n");
    } else {  // Outer else
        if (number == 0) {  // Inner condition
            printf("The number is zero.\n");
        } else {
            printf("The number is negative.\n");
        }
    }

    return 0;
}