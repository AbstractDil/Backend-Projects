#include <stdio.h>

// This program demonstrates the use of a switch statement in C.

int main() {
    int number;

    printf("Enter an integer between 1 and 5: ");
    scanf("%d", &number);

    switch (number) {
        case 1:
            printf("You entered One.\n");
            break;
        case 2:
            printf("You entered Two.\n");
            break;
        case 3:
            printf("You entered Three.\n");
            break;
        case 4:
            printf("You entered Four.\n");
            break;
        case 5:
            printf("You entered Five.\n");
            break;
        default:
            printf("Invalid input! Please enter a number between 1 and 5.\n");
            break;
    }

    return 0;
}

/**
 * write the above code using if-else statements instead of switch-case.
 */

 /*

#include <stdio.h>

int main() {
    int number;

    printf("Enter an integer between 1 and 5: ");
    scanf("%d", &number);

    if (number == 1) {
        printf("You entered One.\n");
    } else if (number == 2) {
        printf("You entered Two.\n");
    } else if (number == 3) {
        printf("You entered Three.\n");
    } else if (number == 4) {
        printf("You entered Four.\n");
    } else if (number == 5) {
        printf("You entered Five.\n");
    } else {
        printf("Invalid input! Please enter a number between 1 and 5.\n");
    }

    return 0;
}
*/