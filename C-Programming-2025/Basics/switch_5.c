#include <stdio.h>

// write a program to check leap year using switch case in C.

int main() {
    int year;
    int isLeap;

    printf("Enter a year: ");
    scanf("%d", &year);

    // Determine if the year is a leap year
    if ((year % 4 == 0 && year % 100 != 0) || (year % 400 == 0)) {
        isLeap = 1; // Leap year
    } else {
        isLeap = 0; // Not a leap year
    }

    switch (isLeap) {
        case 1:
            printf("%d is a leap year.\n", year);
            break;
        case 0:
            printf("%d is not a leap year.\n", year);
            break;
        default:
            printf("Error determining if %d is a leap year.\n", year);
            break;
    }

    return 0;
}