#include <stdio.h>
// Example of while and do-while loops in C
int main() {
    int n;
    // Prompt user for input
    printf("Enter a positive integer: ");
    scanf("%d", &n);
    // Print numbers from 1 to n
    int i = 1;
    while (i <= n) {
        printf("%d\n", i);
        i++;
    }

    // example of do-while loop
    int j = 1;
    printf("Using do-while loop:\n");
    do {
        printf("%d\n", j);
        j++;
    } while (j <= n);

    return 0;
}

/*************************
 * Output Example:
 * Enter a positive integer: 5
 * 1
 * 2
 * 3
 * 4
 * 5
 * Using do-while loop:
 * 1
 * 2
 * 3
 * 4
 * 5
 *************************
 */
