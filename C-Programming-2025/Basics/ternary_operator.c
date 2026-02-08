#include <stdio.h>

int main() {
    int a = 10, b = 20;
    int max;

    // Use ternary operator to find the maximum value
    max = (a > b) ? a : b;

    printf("The maximum value is: %d\n", max); // Output: The maximum value is: 20

    return 0;
}