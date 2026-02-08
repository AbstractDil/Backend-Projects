// write a c program to find gcd of two numbers using euclidean algorithm

#include <stdio.h>

int main() {
    int a, b;
    printf("Enter two integers: ");
    scanf("%d %d", &a, &b);

    // check for non-negative integers
    if (a < 0 || b < 0) {
        printf("Please enter non-negative integers only.\n");
    }else{

    // Euclidean algorithm to find GCD
    while (b != 0) {
        int temp = b;
        b = a % b;
        a = temp;
    }

    printf("The GCD is: %d\n", a);
 }
    return 0;
}