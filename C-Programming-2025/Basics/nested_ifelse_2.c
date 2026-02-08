#include <stdio.h>
int main() {
    int marks;
    printf("Enter your marks: ");
    scanf("%d", &marks);

    if (marks >= 50) {  // Outer condition
        if (marks >= 90) {  // Inner condition
            printf("Grade: A\n");
        } else {
            printf("Grade: B\n");
        }
    } else {
        printf("Grade: F\n");
    }

    return 0;
}