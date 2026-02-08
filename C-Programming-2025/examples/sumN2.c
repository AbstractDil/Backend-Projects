#include <stdio.h>

int main(){

    int n, sum;

    printf("Enter a positive integer: ");
    scanf("%d", &n);

    if (n <= 0) {
        printf("Please enter a positive integer.\n");
        return 1;
    }

    sum = n * (n + 1) / 2; 

    printf("Sum of the first %d natural numbers is %d\n", n, sum);

    return 0;
}