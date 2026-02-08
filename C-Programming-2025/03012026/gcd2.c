// write a c program to find gcd of two numbers using euclidean algorithm
#include <stdio.h>

int gcd(int a, int b) {
    // Euclidean algorithm to find GCD
    while (b != 0) {
        int temp = b;
        b = a % b;
        a = temp;
    }
    return a;
}

int main() {
    int a, b;
    printf("Enter two integers: ");
    scanf("%d %d", &a, &b);

    // check for non-negative integers
    if (a < 0 || b < 0) {
        printf("Please enter non-negative integers only.\n");
    } else {
        int result = gcd(a, b);
        printf("The GCD is: %d\n", result);
    }
    return 0;
}