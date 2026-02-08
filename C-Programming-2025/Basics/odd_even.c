#include <stdio.h>

// write a program to check whether a number is odd or even using ternary operator

// process: 1

int main() {
    int number;
    char* result; // to store the result string

    printf("Enter an integer: ");
    scanf("%d", &number);

    // Using ternary operator to check odd or even
    result = (number % 2 == 0) ? "Even" : "Odd";

    printf("The number is: %s\n", result);

    return 0;
}