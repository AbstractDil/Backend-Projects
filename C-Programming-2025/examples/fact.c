#include <stdio.h>

int main() {
    int n, i = 1;
    int factorial = 1;
    printf("Enter a non-negative integer: ");
    scanf("%d", &n);

    // Check if the number is negative
    if (n < 0) {
        printf("Error: Factorial is not defined for negative numbers.\\n");
    } else {
        // Calculate the factorial using a while loop
        while (i <= n) {
            factorial = factorial * i; // Multiply current factorial by i
            i++;            // Increment the counter
        }
        printf("Factorial of %d is %d \n", n, factorial);
    }

    return 0;
}
