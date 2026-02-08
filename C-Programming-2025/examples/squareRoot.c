#include <stdio.h>
#include <math.h>

// Function to calculate the square root of a number

int main() {
    double number, result;

    // Prompt the user for input
    printf("Enter a number to find its square root: ");
    scanf("%lf", &number);

    // Check if the number is non-negative
    if (number < 0) {
        printf("Error: Cannot compute the square root of a negative number.\n");
        return 1;
    }

    // Calculate the square root
    result = sqrt(number);

    // Display the result
    printf("The square root of %.3f is %.3f\n", number, result);

    return 0;
}