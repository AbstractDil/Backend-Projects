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
    int num, sum = 0, count = 0;
    
    printf("Enter a positive integer: ");
    scanf("%d", &num);
    
    if (num < 2) {
        printf("No prime numbers exist below %d.\n", num);
        return 0;
    }
    
    printf("Prime numbers between 1 and %d:\n", num);
    
    for (int i = 2; i <= num; i++) {
        if (isPrime(i)) {
            printf("%d ", i);
            sum += i;
            count++;
        }
    }
    
    printf("\n\nTotal prime numbers found: %d\n", count);
    printf("Sum of all prime numbers: %d\n", sum);
    
    return 0;
}