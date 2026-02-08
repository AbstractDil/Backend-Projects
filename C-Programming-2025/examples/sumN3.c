#include <stdio.h>

int main() {
    int n, i = 1, sum = 0;

    printf("Enter a positive integer: ");
    scanf("%d", &n);

    if (n <= 0) {
        printf("Please enter a positive integer.\n");
        return 1;
    }

    // using while loop
    while (i <= n) {
        sum = sum + i;
        i++;
    }

    // using do-while loop
    /*
    do {
        sum = sum + i;
        i++;
    } while (i <= n);
    */

    printf("Sum of the first %d natural numbers is %d\n", n, sum);

    return 0;
}
