#include <stdio.h>

// write a program to check the number is even or odd using switch case in C.

int main() {
    int num;

    printf("Enter an integer: ");
    scanf("%d", &num);

    switch (num % 2) {
        case 0:
            printf("%d is even.\n", num);
            break;
        case 1:
            printf("%d is odd.\n", num);
            break;
        default:
            printf("Error: %d is not a valid integer.\n", num);
            break;
    }

    return 0;
}