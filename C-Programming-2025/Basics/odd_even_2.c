#include <stdio.h>

// write a program to check whether a number is odd or even using ternary operator

int main() {
    int number;
    printf("Enter an integer: ");
    scanf("%d", &number);

    // Using ternary operator to check odd or even
    (number % 2 == 0) ? 
        printf("%d is even.\n", number) : 
        printf("%d is odd.\n", number);

    // Using ternary operator to check odd or even and print the result
    //printf("%d is %s.\n", number, (number % 2 == 0) ? "even" : "odd");

    return 0;
}