/**
 * Write a C program to check whether a given number is an Armstrong number or not.
  An Armstrong number of three digits is an integer such that the sum of the cubes of its digits is equal to the number itself.
  For example, 153 is an Armstrong number since 1^3 + 5^3 + 3^3 = 153.
 */

#include <stdio.h>

int main() {
    int num, originalNum, remainder, sum = 0;
    printf("Enter an integer: ");
    scanf("%d", &num);

    originalNum = num;

    // Calculating the sum of cubes of each digit
    while (num != 0) {
        remainder = num % 10;
        sum += remainder * remainder * remainder;
        num = num / 10;
    }

    if (originalNum == sum) {
        printf("%d is an Armstrong number.\n", originalNum);
    } else {
        printf("%d is not an Armstrong number.\n", originalNum);
    }

    return 0;
}