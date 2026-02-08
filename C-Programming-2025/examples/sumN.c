#include <stdio.h>

int main() {
    int n, i, sum = 0;

    printf("Enter a positive integer: ");
    scanf("%d", &n);

    // Input validation for natural numbers (which start from 1)
    if (n <= 0) {
        printf("Please enter a positive integer.\n");
        return 1; // Exit with an error code
    }

    for (i = 1; i <= n; i++) {
        sum = sum + i;
    }

    printf("Sum of the first %d natural numbers is %d\n", n, sum);

    return 0;
}
