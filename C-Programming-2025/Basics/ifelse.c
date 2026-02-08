#include <stdio.h>

// example of if-else statement in C

int main() {
    
    int age = 14;

    // If-Else statement
    if (age >= 18) {
        printf("Eligible for vote\n");
    } else {
        printf("Not eligible for vote\n");
    }

    // pass and fail example
    int marks = 75;
    if (marks >= 50) {
        printf("Pass\n");
    } else {
        printf("Fail\n");
    }

    return 0;
}