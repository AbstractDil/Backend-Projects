#include <stdio.h>
#include <math.h>

// function to check if a number is prime
int isPrime(int n) {
    if (n <= 1) {
        return 0; // not prime
    }
    if (n == 2) {
        return 1; // 2 is prime
    }
    if (n % 2 == 0) {
        return 0; // even numbers (except 2) are not prime
    }
    for (int i = 3; i <= sqrt(n); i += 2) {
        if (n % i == 0) {
            return 0; // found a divisor, not prime
        }
    }
    return 1; // prime
}

int main() {
    int num;
    
    printf("Enter a positive integer: ");
    scanf("%d", &num);
    
    if (num < 2) {
        printf("No prime numbers exist below %d.\n", num);
        return 0;
    }
    
    // Check if the number is prime
    if (isPrime(num)) {
        printf("%d is a prime number.\n", num);
    } else {
        printf("%d is not a prime number.\n", num);
    }

    
    return 0;
}